
import React from "react"
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {cardStyle} from "../../../snippets/cardStyle";
import {Link} from "react-router-dom";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../services/icons/icons";
export default function ExperienceCreate() {
    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`Create Experience`}
                    action={
                        <>
                            <Link to={`/dashboard/experience`}>
                                <FontAwesomeIcon icon={getBrandIcon(`faArrowCircleLeft`)} />
                            </Link>
                        </>
                    }
                />
                <CardContent>

                </CardContent>
            </Card>
        </Grid>
    )
}
