

import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {Link, useParams} from "react-router-dom";
import {cardStyle, secondCardStyle} from "../../../snippets/cardStyle";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../services/icons/icons";
import ClientEditData from "./ClientEditData"
export default function ClientEdit() {
    let id = useParams()

    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`View/Edit Client`}
                    action={
                        <>
                            <Link to={`/dashboard/clients`}>
                                <FontAwesomeIcon icon={getBrandIcon(`faArrowCircleLeft`)} />
                            </Link>
                        </>
                    }
                />
                <CardContent>
                    <ClientEditData id={id} />
                </CardContent>
            </Card>
        </Grid>
    )
}
