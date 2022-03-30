//https://ka2.org/manual-about-svg-japan

import 'svg-japan/dist/svg-japan.min'

document.addEventListener( 'DOMContentLoaded', function() {
    svgJapan({
        element: '#map',
        type: 'deform',
        regionality: true,
        activeColor: '#3b82f6',
        width: '100%',
        height: '100%'
    })
}, false)
