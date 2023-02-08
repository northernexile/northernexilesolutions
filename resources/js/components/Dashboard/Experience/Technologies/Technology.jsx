
import React, {useEffect, useState} from "react"
import {Chip} from "@mui/material";
import {toggleExperienceTechnology} from "../../../../redux/actions/experienceTechnologyActions";
import {useAppDispatch} from "../../../../redux/hooks/hooks";

const Technology = (params) => {
    const dispatch = useAppDispatch()
    const name = params.name
    let selected = params.selected

    const [itemSelected,setItemSelected] = useState(false)

    useEffect(()=>{setItemSelected(selected)},[])

    const toggleItemSelected = () => {
        let toggled = !itemSelected
        setItemSelected(toggled)
        dispatch(toggleExperienceTechnology(params.experienceId,params.skillId))
    }

    const getColor = () => {
        return itemSelected ? "primary" : "secondary"
    }

    return (
        <Chip
            style={{marginRight: 2,marginBottom:2}}
            label={name}
            key={`tech-chip-${name}`}
            onClick={()=>{toggleItemSelected()}}
            color={getColor()}
        />
    )
}

export default Technology
