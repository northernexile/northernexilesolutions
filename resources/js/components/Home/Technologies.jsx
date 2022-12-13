import React, {useEffect, useState} from "react"
import {Card, CardContent, CardHeader} from "@mui/material";
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'

import SkillService from "../../services/SkillService";
import getBrandIcon from "../../services/icons/icons";

const Technologies = React.FC = () => {
    const [skills, setSkills] = useState([]);

    useEffect(() => {
        retrieveSkills()
    }, []);

    const retrieveSkills = () => {
        SkillService.getAll().then((response) => {
            console.log('alpha')
            setSkills(response.data.data.skills);
            console.log(response.data.data.skills);
        }).catch((e) => {
            console.log('error')
            console.log(e);
        })
    }

    return (

        <Card elevation={2}
              style={{
                  padding: 8,
                  marginTop: 8,
                  marginBottom: 8
              }}
        >
            <CardHeader title={'Technologies'}/>
            <CardContent>
                <ul>
                    {skills &&
                        skills.map((skill, index) => (
                            <li key={skill.name}>
                                <FontAwesomeIcon icon={getBrandIcon(skill.icon)} />
                                <span>{skill.name}</span>
                            </li>
                        ))}
                </ul>
            </CardContent>
        </Card>
    )
};

export default Technologies;
