
import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import ContactEdit from "../../Contact/Data/ContactEdit";
import {Link, useParams} from "react-router-dom";
import {cardStyle} from "../../../snippets/cardStyle";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../services/icons/icons";
import ApiErrorDisplay from "../../../errors/ApiErrorDisplay";

export default function MessageEdit() {
    let id = useParams()

    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`View/Edit Message`}
                    action={
                        <>
                            <Link to={`/dashboard/messages`}>
                                <FontAwesomeIcon icon={getBrandIcon(`faArrowCircleLeft`)} />
                            </Link>
                        </>
                    }
                />
                <CardContent>
                    <ApiErrorDisplay />
                    <ContactEdit id={id} />
                </CardContent>
            </Card>
        </Grid>
    )
}
