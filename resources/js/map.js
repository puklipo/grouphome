//https://github.com/geolonia/japanese-prefectures

const prefs = document.querySelectorAll('.geolonia-svg-map .prefecture')

prefs.forEach((pref) => {
    // マウスオーバーで色を変える
    pref.addEventListener('mouseover', (event) => {
        event.currentTarget.style.fill = "#3b82f6"
    })

    // マウスが離れたら色をもとに戻す
    pref.addEventListener('mouseleave', (event) => {
        event.currentTarget.style.fill = ""
    })

    // マウスクリック時のイベント
    pref.addEventListener('click', (event) => {
        location.href = `/pref/${event.currentTarget.dataset.code}`
    })
})
