import React, {useEffect, useState} from "react"
import {Card, CardContent, CardHeader, Paper} from "@mui/material";
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'

import SkillService from "../../services/SkillService";
import getBrandIcon from "../../services/icons/icons";
import Carousel,{CarouselItem} from "../UI/Carousel/Carousel";

const Technologies = React.FC = () => {
    const [skills, setSkills] = useState([]);

    useEffect(() => {
        retrieveSkills()
    }, []);

    const retrieveSkills = () => {
        SkillService.getAll().then((response) => {
            setSkills(response.data.data.skills);
        }).catch((e) => {
            console.log(e);
        })
    }

    return (

        <Card elevation={2}
              style={{
                  paddingTop: 8,
                  paddingLeft:0,
                  paddingRight:0,
                  paddingBottom:8,
                  margin:8
              }}
        >
            <CardHeader
                className="title-bar"
                title={'Technologies'}
                action={
                    <div>
                        <FontAwesomeIcon icon={getBrandIcon('faDesktop')} />
                    </div>
                }
            />
            <CardContent>
                <Carousel>
                    {skills &&
                        skills.map((skill, index) => (
                            <CarouselItem key={skill.name}>
                                <div>
                                <FontAwesomeIcon
                                    title={skill.name}
                                    className={'tech-icon'}
                                    icon={getBrandIcon(skill.icon)}
                                    size="4x" fixedWidth
                                    color={'secondary'}
                                />
                                    <div className="legend">{skill.name}</div>
                                </div>
                            </CarouselItem>
                        ))}
                </Carousel>
            </CardContent>
        </Card>
    )
};

export default Technologies;
