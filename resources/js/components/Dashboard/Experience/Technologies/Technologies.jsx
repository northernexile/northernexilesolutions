
import React, {useEffect} from "react"
import {useParams} from "react-router-dom";
import {useAppSelector,useAppDispatch} from "../../../../redux/hooks/hooks";
import {getAllTechnologies} from "../../../../redux/actions/technologyActions";
import {getAllExperienceTechnologies} from "../../../../redux/actions/experienceTechnologyActions";
import Technology from "./Technology";
const Technologies = () => {
    const dispatch = useAppDispatch()
    const experience = useParams()

    const technologies = useAppSelector(state => state.technology.technologies)
    const assigned = useAppSelector(state => state.experienceTechnology.experienceTechnologies)

    useEffect(()=>{
        getAssigned()
    },[])

    console.log(technologies)
    console.log(assigned)

    const getTechnologies = () => {
        dispatch(getAllTechnologies())
    }

    const getAssigned = () => {
        dispatch(getAllExperienceTechnologies(experience)).then(() => {getTechnologies()})
    }

    const isSelected = (technologyId) => {
        let selected = false;
        const assignedTech = assigned.find((filter)=>{
            return parseInt(filter.skill_id) === parseInt(technologyId)
        })

        if(assignedTech !== undefined){
            selected = true
        }

        return selected
    }

    const mapped = () => {
        return technologies.map((tech,techIndex)=>(
            <Technology name={tech.name} skillId={tech.id} experienceId={experience.id} selected={isSelected(tech.id)} />
        ))
    }

    return (
        <div className={`tech-chips`}>
            {mapped()}
        </div>
    )
}

export default Technologies
