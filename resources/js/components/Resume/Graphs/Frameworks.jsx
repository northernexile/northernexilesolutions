
import React from "react"
import {Chart as ChartJS,CategoryScale,LinearScale,BarElement,Title,Tooltip,Legend} from "chart.js"
import {Bar} from "react-chartjs-2"

ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend
);

const Frameworks = ({labels,datasets,title = 'Framework Experience',displayTitle= true}) => {
    const data = {
        labels:labels,
        datasets:datasets
    }

    const options = {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: displayTitle,
                text: title,
            },
        },
    };



    return (
        <Bar data={data} options={options} />
    )
}

export default Frameworks
