
import React from "react"
import Frameworks from "./Graphs/Frameworks";


const Graphs = ({frameworks}) => {

    return (
        <div className={`graphs`}>
            <Frameworks datasets={frameworks.datasets} labels={frameworks.labels} />
        </div>
    )
}

export default Graphs;
