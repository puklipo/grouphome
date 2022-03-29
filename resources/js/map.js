require('svg-japan')

document.addEventListener( 'DOMContentLoaded', function() {
    svgJapan({
        element: "#map",
        type: "deform",
        regionality: true,
    })
}, false)
