
import React from "react"
import BarGraph from "./Graphs/BarGraph";
import {Grid} from "@mui/material";


const Graphs = ({frameworks,sectors,technologies}) => {

    return (
        <div className={`graphs`}>
            <Grid container spacing={2}>
                <Grid item xs={12} md={6}>
                    <div style={{minHeight:400}}>
                        <BarGraph
                            datasets={frameworks.data.datasets}
                            labels={frameworks.data.labels}
                            title={`Framework experience in months`}
                        />
                    </div>
                </Grid>
                <Grid item xs={12} md={6}>
                    <div style={{minHeight:400}}>
                        <BarGraph
                            datasets={sectors.data.datasets}
                            labels={sectors.data.labels}
                            title={`Sector experience in months`}
                        />
                    </div>
                </Grid>
                <Grid item xs={12}>
                    <div style={{minHeight:400}}>
                        <BarGraph
                            datasets={technologies.data.datasets}
                            labels={technologies.data.labels}
                            title={`Technology expeience in months`}
                        />
                    </div>
                </Grid>
            </Grid>
        </div>
    )
}

export default Graphs;
