import React, {useEffect} from "react";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {deleteTechnology, addTechnology, getAllTechnologies} from "../../../redux/actions/technologyActions";
import {getAllTechnologyTypes} from "../../../redux/actions/technologyTypeActions";
import {Chip} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import FormRowInput from "../../../controls/rows/FormRowInput";
import {useFormHooks} from "../../../hooks/useFormHooks";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../../services/icons/icons";
import FormRowDropdown from "../../../controls/rows/FormRowDropdown";
import FormRowMultilineInput from "../../../controls/rows/FormRowMultilineInput";

const TechnologyList = () => {
    const {createButton} = useFormHooks()
    const {control,handleSubmit} = useForm()
    const dispatch = useAppDispatch();
    const technologies = useAppSelector(state => state.technology.technologies)
    const technologyTypes = useAppSelector(state => state.technologyType.technologyTypes)
    useEffect(() => {
        handleLoad()
    }, []);

    const handleLoad = () => {
        dispatch(getAllTechnologies())
            .then(()=>dispatch(getAllTechnologyTypes()))
        console.log(technologies)
    }

    const handleDelete = (technology) => {
        dispatch(deleteTechnology(technology))
            .then(() => dispatch(getAllTechnologies()))
    }

    const handleCreate = (technology) => {
        let payload = {
            id:null,
            name:technology.name,
            skillTypeId:technology.skill_type_id,
            icon:'',
            description:technology.description
        }
        dispatch(addTechnology(payload))
            .then(() => dispatch(getAllTechnologies()))
    }

    const submitForm = (data) => {
        handleCreate(data)
    }

    const form = () => {
        return <FormProvider {...form}>
            <form onSubmit={handleSubmit(submitForm)}>
                <FormRowInput name={`name`} label={`Technology name`} control={control} />
                <FormRowMultilineInput name={`description`} label={`Description`} control={control} />
                <FormRowDropdown
                    name={`skill_type_id`}
                    label={`Type`}
                    control={control}
                    options={technologyTypes}
                    placeholder={`Please select`}
                />
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
