
import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {cardStyle} from "../../../snippets/cardStyle";
import ResumeData from "../../Resume/Data/ResumeData";
import {Link} from "react-router-dom";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../services/icons/icons";

export default function Experience() {
    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`Experience`}
                    action={
                        <>
                            <Link to={`/dashboard/experience/create`}>
                                <FontAwesomeIcon icon={getBrandIcon(`faPlus`)} />
                            </Link>
                        </>
                    }
                />
                <CardContent>
                    <ResumeData />
                </CardContent>
            </Card>
        </Grid>
    )
}
