
import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {cardStyle} from "../../../snippets/cardStyle";
import {Link} from "react-router-dom";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../services/icons/icons";
import ClientsData from "./ClientsData";

const Clients = () => {
    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`Clients`}
                    action={
                        <>
                            <Link to={`/dashboard/clients/create`}>
                                <FontAwesomeIcon icon={getBrandIcon(`faPlus`)} />
                            </Link>
                        </>
                    }
                />
                <CardContent>
                    <ClientsData />
                </CardContent>
            </Card>
        </Grid>
    )
}

export default Clients
