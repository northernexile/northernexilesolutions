
import React from "react";
import {cardStyle} from "../../../snippets/cardStyle";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import TagList from "./TagList";
const Tags = () => {
    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`Tags`}
                />
                <CardContent>
                    <TagList />
                </CardContent>
            </Card>
        </Grid>
    )
}

export default Tags
