document.addEventListener("DOMContentLoaded", () => {
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    window.echart = echarts.init(document.querySelector("#workflowChart"));
    window.echart.setOption({
        tooltip: {
            trigger: 'item'
        },
        legend: {
            top: '5%',
            orient: 'horizontal',
            center: 'right'
        },
        series: [{
            type: 'pie',
            top: '100px',
            radius: ['0%', '80%'],
            avoidLabelOverlap: false,
            emphasis: {
                label: {
                    show: true,
                    fontSize: '14',
                    fontWeight: 'bold'
                }
            },
            labelLine: {
                show: true
            },
            data: [
                { value: 0, name: 'Responsable Pédagogique' },
                { value: 0, name: 'Planification Projets' },
                { value: 0, name: 'Face à Face' },
                { value: 0, name: 'Suivi Élève' },
                { value: 0, name: 'Conception Nationale' },
                { value: 0, name: 'Activités Campus' },
                { value: 0, name: 'Activités Annexes' }
            ]
        }]
    });

    /**
     * Autoupdate echart charts
     */
    window.addEventListener('updateChart', event => {
        window.echart.setOption({
            series: [{
                data: event.detail.data
            }]
        });
    })

    /**
     * Autoresize echart charts
     */
    const mainContainer = select('#workflowChart');
    if (mainContainer) {
        setTimeout(() => {
            new ResizeObserver(function () {
                select('.echart', true).forEach(getEchart => {
                    echarts.getInstanceByDom(getEchart).resize();
                })
            }).observe(mainContainer);
        }, 200);
    }
});