import React, {useEffect} from "react";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {deleteTechnology, addTechnology, getAllTechnologies} from "../../../redux/actions/technologyActions";
import {Chip} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import FormRowInput from "../../../controls/rows/FormRowInput";
import {useFormHooks} from "../../../hooks/useFormHooks";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../services/icons/icons";

const TechnologyList = () => {
    const {createButton} = useFormHooks()
    const {control,handleSubmit} = useForm()
    const dispatch = useAppDispatch();
    const technologies = useAppSelector(state => state.technology.technologies)

    useEffect(() => {
        handleLoad()
    }, []);

    console.log(technologies)

    const handleLoad = () => {
        dispatch(getAllTechnologies())
        console.log(technologies)
    }

    const handleDelete = (technology) => {
        dispatch(deleteTechnology(technology))
            .then(() => dispatch(getAllTechnologies()))
    }

    const handleCreate = (technology) => {
        dispatch(addTechnology(technology))
            .then(() => dispatch(getAllTechnologies()))
    }

    const submitForm = (data) => {
        handleCreate(data)
    }

    const form = () => {
        return <FormProvider {...form}>
            <form onSubmit={handleSubmit(submitForm)}>
                <FormRowInput name={`name`} label={`Technology name`} control={control} />
                <div className={`form-row`}>
                    {createButton()}
                </div>
            </form>
        </FormProvider>
    }

    const technologyList = () => {
        return (<div className={`technology-chip-list`}>
                {technologies.map((technology, index) => (
                    <Chip
                        icon={<FontAwesomeIcon icon={getBrandIcon(technology.icon)} />}
                        style={{marginRight: 2,marginBottom:2}}
                        label={technology.name}
                        onDelete={() => {
                            handleDelete(technology)
                        }}
                        key={`technology-chip-${technology.id}`}
                    />
                ))}
            </div>
        )
    }

    return (
        <div className={`tag-list technology-chips`}>
            <div className={`technology-chip-create`}>
                {form()}
            </div>
            {technologies && technologyList()}
        </div>
    )
}

export default TechnologyList
