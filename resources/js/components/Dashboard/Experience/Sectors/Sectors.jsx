
import React, {useEffect} from "react"
import {useParams} from "react-router-dom";
import {useAppSelector,useAppDispatch} from "../../../../redux/hooks/hooks";
import Sector from "./Sector";
import {getAllSectors} from "../../../../redux/actions/sectorActions";
import {getAllExperienceSectors} from "../../../../redux/actions/experienceSectorActions";
const Sectors = () => {
    const dispatch = useAppDispatch()
    const experience = useParams()

    const sectors = useAppSelector(state => state.sectors.sectors)
    const assigned = useAppSelector(state => state.experienceSector.experienceSectors)

    useEffect(()=>{
        getAssigned()
    },[])

    const getSectors = () => {
        dispatch(getAllSectors())
    }

    const getAssigned = () => {
        dispatch(getAllExperienceSectors(experience))
            .then(() => {getSectors()})
    }

    const isSelected = (sectorId) => {
        let selected = false;
        const assignedSector = assigned.find((filter)=>{
            return parseInt(filter.sector_id) === parseInt(sectorId)
        })

        if(assignedSector !== undefined){
            selected = true
        }

        return selected
    }

    const mapped = () => {
        return sectors.map((sector,sectorIndex)=>(
            <Sector name={sector.name} sectorId={sector.id} experienceId={experience.id} selected={isSelected(sector.id)} />
        ))
    }

    return (
        <div className={`sector-chips`}>
            {mapped()}
        </div>
    )
}

export default Sectors
