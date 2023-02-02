
import React from "react";
import {cardStyle} from "../../../snippets/cardStyle";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import SectorList from "./SectorList";
const Sectors = () => {
    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`Sectors`}
                />
                <CardContent>
                    <SectorList />
                </CardContent>
            </Card>
        </Grid>
    )
}

export default Sectors
