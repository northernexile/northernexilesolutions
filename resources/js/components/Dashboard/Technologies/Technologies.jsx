
import React from "react";
import {cardStyle} from "../../../snippets/cardStyle";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import TechnologyList from "./TechnologyList";
const Technologies = () => {
    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`Technologies`}
                />
                <CardContent>
                    <TechnologyList />
                </CardContent>
            </Card>
        </Grid>
    )
}

export default Technologies
