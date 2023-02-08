
import React, {useEffect, useState} from "react"
import {Chip} from "@mui/material";
import {toggleExperienceTag} from "../../../../redux/actions/experienceTagActions";
import {useAppDispatch} from "../../../../redux/hooks/hooks";

const Tag = (params) => {
    const dispatch = useAppDispatch()
    const name = params.name
    let selected = params.selected

    const [itemSelected,setItemSelected] = useState(false)

    useEffect(()=>{setItemSelected(selected)},[])

    const toggleItemSelected = () => {
        let toggled = !itemSelected
        setItemSelected(toggled)
        dispatch(toggleExperienceTag(params.experienceId,params.tagId))
    }

    const getColor = () => {
        return itemSelected ? "primary" : "secondary"
    }

    return (
        <Chip
            style={{marginRight: 2,marginBottom:2}}
            label={name}
            key={`tag-chip-${name}`}
            onClick={()=>{toggleItemSelected()}}
            color={getColor()}
        />
    )
}

export default Tag
