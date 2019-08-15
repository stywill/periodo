<?php declare(strict_types=1);

namespace Phan\Language;

/**
 * This is used to represent a union type that has various annotations.
 * Currently, the only annotation is is_possibly_undefined, which is used in optional fields of array shapes.
 * (It might eventually be used for variables that are defined in some branches but not others)
 *
 * NOTE: Instances should be immutable after UnionType returns them.
 * They are not unique for combination of types and options.
 *
 * The internal representation may change in the future.
 */
class AnnotatedUnionType extends UnionType
{
    protected const DEFINITELY_UNDEFINED = 1;

    /**
     * @var bool|1 is this union type possibly undefined
     * (e.g. a possibly undefined array shape offset)
     */
    protected $is_possibly_undefined = false;

    /**
     * @override
     */
    public function withIsPossiblyUndefined(bool $is_possibly_undefined) : UnionType
    {
        if ($this->is_possibly_undefined === $is_possibly_undefined) {
            return $this;
        }
        if (!$is_possibly_undefined) {
            return UnionType::of($this->getTypeSet(), $this->getRealTypeSet());
        }
        $result = clone($this);
        $result->is_possibly_undefined = $is_possibly_undefined;
        return $result;
    }

    /**
     * @override
     */
    public function withIsDefinitelyUndefined() : UnionType
    {
        if ($this->is_possibly_undefined === self::DEFINITELY_UNDEFINED) {
            return $this;
        }
        $result = clone($this);
        $result->is_possibly_undefined = self::DEFINITELY_UNDEFINED;
        return $result;
    }


    public function asSingleScalarValueOrNull()
    {
        if ($this->is_possibly_undefined) {
            return null;
        }
        return parent::asSingleScalarValueOrNull();
    }

    public function asSingleScalarValueOrNullOrSelf()
    {
        if ($this->is_possibly_undefined) {
            return $this;
        }
        return parent::asSingleScalarValueOrNullOrSelf();
    }

    public function asValueOrNullOrSelf()
    {
        if ($this->is_possibly_undefined) {
            return $this;
        }
        return parent::asValueOrNullOrSelf();
    }

    public function isPossiblyUndefined() : bool
    {
        return (bool) $this->is_possibly_undefined;
    }

    public function isDefinitelyUndefined() : bool
    {
        return $this->is_possibly_undefined === self::DEFINITELY_UNDEFINED;
    }

    public function __toString() : string
    {
        $result = parent::__toString();
        if ($this->is_possibly_undefined) {
            return $result . '=';
        }
        return $result;
    }

    /**
     * Add a type name to the list of types
     * @override
     */
    public function withType(Type $type) : UnionType
    {
        return parent::withType($type)->withIsPossiblyUndefined(false);
    }

    /**
     * Add a type name to the list of types
     * @override
     */
    public function withoutType(Type $type) : UnionType
    {
        return parent::withoutType($type)->withIsPossiblyUndefined(false);
    }

    /**
     * Returns a union type which add the given types to this type
     * @override
     */
    public function withUnionType(UnionType $union_type) : UnionType
    {
        return parent::withUnionType($union_type)->withIsPossiblyUndefined(false);
    }

    /**
     * @return bool - True if not empty, not possibly undefined, and at least one type is NullType or nullable.
     * @override
     */
    public function containsNullableOrUndefined() : bool
    {
        return $this->is_possibly_undefined || $this->containsNullable();
    }

    /**
     * @override
     */
    public function generateUniqueId() : string
    {
        $id = parent::generateUniqueId();
        if ($this->is_possibly_undefined) {
            return $id . '=';
        }
        return $id;
    }
}
