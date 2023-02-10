
import React from "react"
import Frameworks from "./Graphs/Frameworks";
import {Grid} from "@mui/material";


const Graphs = ({frameworks}) => {

    return (
        <div className={`graphs`}>
            <Grid container spacing={2}>
                <Grid item xs={12} md={6}>
                    <div style={{minHeight:400}}>
                        <Frameworks datasets={frameworks.datasets} labels={frameworks.labels} />
                    </div>
                </Grid>
            </Grid>
        </div>
    )
}

export default Graphs;
