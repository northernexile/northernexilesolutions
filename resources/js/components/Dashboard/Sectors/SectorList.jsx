import React, {useEffect} from "react";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {deleteSector, getAllSectors, addSector} from "../../../redux/actions/sectorActions";
import {Chip} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import Identity from "../../../controls/Identity";
import FormRowInput from "../../../controls/rows/FormRowInput";
import FormRowMultilineInput from "../../../controls/rows/FormRowMultilineInput";
import FormRowInputDate from "../../../controls/rows/FormRowInputDate";
import {useFormHooks} from "../../../hooks/useFormHooks";

const SectorList = () => {
    const {createButton} = useFormHooks()
    const {control,handleSubmit} = useForm()
    const dispatch = useAppDispatch();
    const sectors = useAppSelector(state => state.sectors.sectors)

    useEffect(() => {
        handleLoad()
    }, []);

    const handleLoad = () => {
        dispatch(getAllSectors())
        console.log(sectors)
    }

    const handleDelete = (sector) => {
        dispatch(deleteSector(sector))
            .then(() => dispatch(getAllSectors()))
    }

    const handleCreate = (sector) => {
        dispatch(addSector(sector))
            .then(() => dispatch(getAllSectors()))
    }

    const submitForm = (data) => {
        handleCreate(data)
    }

    const form = () => {
        return <FormProvider {...form}>
            <form onSubmit={handleSubmit(submitForm)}>
                <FormRowInput name={`name`} label={`Sector name`} control={control} />
                <div className={`form-row`}>
                    {createButton()}
                </div>
            </form>
        </FormProvider>
    }

    const sectorList = () => {
        return (<div className={`sector-chip-list`}>
                    {sectors.map((sector, index) => (
                        <Chip
                            style={{marginRight: 2,marginBottom:2}}
                            label={sector.name}
                            onDelete={() => {
                                handleDelete(sector)
                            }}
                            key={`sector-chip-${sector.id}`}
                        />
                    ))}
                </div>

        )
    }

    return (
        <div className={`tag-list sector-chips`}>
            <div className={`sector-chip-create`}>
                {form()}
            </div>
            {sectors && sectorList()}
        </div>
    )
}

export default SectorList
