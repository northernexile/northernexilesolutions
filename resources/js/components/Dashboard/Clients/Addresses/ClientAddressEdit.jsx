

import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {Link, useParams} from "react-router-dom";
import {cardStyle} from "../../../../snippets/cardStyle";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../../services/icons/icons";
import ClientAddressEditData from "./ClientAddressEditData";
export default function ClientAddressEdit() {
    let id = useParams()

    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`View/Edit Client Address`}
                    action={
                        <>
                            <Link to={`/dashboard/clients/`+id}>
                                <FontAwesomeIcon icon={getBrandIcon(`faArrowCircleLeft`)} />
                            </Link>
                        </>
                    }
                />
                <CardContent>
                    <ClientAddressEditData id={id} />
                </CardContent>
            </Card>
        </Grid>
    )
}
