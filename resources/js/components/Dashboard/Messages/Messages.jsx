
import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import ContactData from "../../Contact/Data/ContactData";
import {cardStyle} from "../../../snippets/cardStyle";

export default function Messages() {
    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader className={`title-bar`} title={`Messages`}/>
                <CardContent>
                    <ContactData />
                </CardContent>
            </Card>
        </Grid>
    )
}
