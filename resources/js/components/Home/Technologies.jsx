import React, {useEffect, useState} from "react"
import {Card, CardContent, CardHeader} from "@mui/material";
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {
    faLaravel,
    faBootstrap,
    faPhp,
    faSymfony,
    faMagento,
    faLess,
    faHtml5,
    faShopify,
    faVuejs,
    faReact,
    faAws,
    faWordpress,
    faAngular,
    faPython
} from '@fortawesome/free-brands-svg-icons'
import SkillService from "../../services/SkillService";
import {faCode} from "@fortawesome/free-solid-svg-icons";

const icons = [
    {name:'faLaravel',icon:faLaravel},
    {name:'faBootstrap',icon:faBootstrap},
    {name:'faPhp',icon:faPhp},
    {name:'faSymfony',icon:faSymfony},
    {name:'faMagento',icon:faMagento},
    {name:'faLess',icon:faLess},
    {name:'faHtml5',icon:faHtml5},
    {name:'faShopify',icon:faShopify},
    {name:'faVuejs',icon:faVuejs},
    {name:'faReact',icon:faReact},
    {name:'faAws',icon:faAws},
    {name:'faWordpress',icon:faWordpress},
    {name:'faAngular',icon:faAngular},
    {name:'faPython',icon:faPython},
    {name: 'faCode',icon: faCode}
]

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

    const getBrandIcon = (brand) => {
        let icon = icons.filter( (ico) => {
            return ico.name === brand
        });

        if(icon.length === 0){
            return faCode
        }

        return icon[0].icon;
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
