
import React, {useEffect} from "react"
import {useParams} from "react-router-dom";
import {useAppSelector,useAppDispatch} from "../../../../redux/hooks/hooks";
import {getAllTag} from "../../../../redux/actions/tagActions";
import Tag from "./Tag";
import {getAllExperienceTags} from "../../../../redux/actions/experienceTagActions";
const Tags = () => {
    const dispatch = useAppDispatch()
    const experience = useParams()

    const tags = useAppSelector(state => state.tag.tags)
    const assigned = useAppSelector(state => state.experienceTag.experienceTags)

    useEffect(()=>{
        getAssigned()
    },[])

    const getTags = () => {
        dispatch(getAllTag())
    }

    const getAssigned = () => {
        dispatch(getAllExperienceTags(experience))
            .then(() => {getTags()})
    }

    const isSelected = (tagId) => {
        let selected = false;
        const assignedTag = assigned.find((filter)=>{
            return parseInt(filter.tag_id) === parseInt(tagId)
        })

        if(assignedTag !== undefined){
            selected = true
        }

        return selected
    }

    const mapped = () => {
        return tags.map((tag,tagIndex)=>(
            <Tag name={tag.name} tagId={tag.id} experienceId={experience.id} selected={isSelected(tag.id)} />
        ))
    }

    return (
        <div className={`tag-chips`}>
            {mapped()}
        </div>
    )
}

export default Tags
