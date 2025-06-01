<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>場所検索 + ピン + Wikipedia画像</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        #map { height: 500px; width: 100%; margin-top: 10px; }
        #info { margin-top: 15px; }
        img.thumb { max-width: 300px; margin-top: 10px; }
    </style>
</head>
<body>

    <h2>場所を検索してピンと情報を表示</h2>
    <input type="text" id="placeInput" placeholder="例: 東京駅">
    <button onclick="searchAndDisplay()">検索</button>

    <div id="map"></div>
    <div id="info"></div>

    <script>
        // 地図初期化
        var map = L.map('map').setView([35.681236, 139.767125], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);
        var currentMarker;

        function searchAndDisplay() {
            const place = document.getElementById("placeInput").value;
            if (!place) return alert("地名を入力してください");

            // ジオコーディング
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(place)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) return alert("場所が見つかりません");

                    const lat = parseFloat(data[0].lat);
                    const lon = parseFloat(data[0].lon);

                    if (currentMarker) map.removeLayer(currentMarker);
                    currentMarker = L.marker([lat, lon]).addTo(map)
                        .bindPopup(`${place}`)
                        .openPopup();

                    map.setView([lat, lon], 15);

                    // Wikipedia APIで画像と説明を取得
                    fetch(`https://ja.wikipedia.org/api/rest_v1/page/summary/${encodeURIComponent(place)}`)
                        .then(res => res.json())
                        .then(wiki => {
                            let html = `<h3>${wiki.title}</h3>`;
                            if (wiki.thumbnail) {
                                html += `<img class="thumb" src="${wiki.thumbnail.source}" alt="${wiki.title}">`;
                            }
                            if (wiki.extract) {
                                html += `<p>${wiki.extract}</p>`;
                            } else {
                                html += `<p>説明文が見つかりませんでした。</p>`;
                            }
                            document.getElementById("info").innerHTML = html;
                        })
                        .catch(err => {
                            console.error(err);
                            document.getElementById("info").innerHTML = `<p>Wikipedia情報が取得できませんでした。</p>`;
                        });
                });
        }
    </script>
</body>
</html>
