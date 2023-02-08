

import React from "react";
import {Card, CardContent, CardHeader, Grid} from "@mui/material";
import {Link, useParams} from "react-router-dom";
import {cardStyle, secondCardStyle} from "../../../snippets/cardStyle";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../services/icons/icons";
import ResumeEdit from "../../Resume/Data/ResumeEdit";
import Projects from "./Projects/Projects";
import Technologies from "./Technologies/Technologies";
import Sectors from "./Sectors/Sectors";
import Tags from "./Tags/Tags";

export default function ExperienceEdit() {
    let id = useParams()

    return (
        <Grid item xs={12}>
            <Card elevation={2}
                  style={cardStyle}
            >
                <CardHeader
                    className={`title-bar`}
                    title={`View/Edit Experience`}
                    action={
                        <>
                            <Link to={`/dashboard/experience`}>
                                <FontAwesomeIcon icon={getBrandIcon(`faArrowCircleLeft`)} />
                            </Link>
                        </>
                    }
                />
                <CardContent>
                    <ResumeEdit id={id} />
                </CardContent>
            </Card>
            <Card elevation={2} style={secondCardStyle}>
                <CardHeader
                    className={`title-bar`}
                    title={`Projects`} />
                <CardContent>
                    <Projects experienceId={id} />
                </CardContent>
            </Card>
            <Card elevation={2} style={secondCardStyle}>
                <CardHeader
                    className={`title-bar`}
                    title={`Technologies`} />
                <CardContent>
                    <Technologies />
                </CardContent>
            </Card>
            <Card elevation={2} style={secondCardStyle}>
                <CardHeader
                    className={`title-bar`}
                    title={`Sectors`} />
                <CardContent>
                    <Sectors />
                </CardContent>
            </Card>
            <Card elevation={2} style={secondCardStyle}>
                <CardHeader
                    className={`title-bar`}
                    title={`Tags`} />
                <CardContent>
                    <Tags />
                </CardContent>
            </Card>
        </Grid>
    )
}
