

import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {Link, useParams} from "react-router-dom";
import {cardStyle, secondCardStyle} from "../../../snippets/cardStyle";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../services/icons/icons";
import ClientEditData from "./ClientEditData"
import ClientAddresses from "./Addresses/ClientAddresses";
import ClientInvoices from "./Invoices/ClientInvoices";
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

            <Card elevation={2} style={secondCardStyle}>
                <CardHeader
                    className={`title-bar`}
                    title={`Addresses`} />
                <CardContent>
                    <ClientAddresses clientId={id} />
                </CardContent>
            </Card>

            <Card elevation={2} style={secondCardStyle}>
                <CardHeader
                    className={`title-bar`}
                    title={`Invoices`} />
                <CardContent>
                    <ClientInvoices clientId={id} />
                </CardContent>
            </Card>
        </Grid>
    )
}
