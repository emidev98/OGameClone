- Users: *Id*, Name, Email, Password

- Fleet: *Id*, userId, planetId
    on userId ref Users
    on planetId ref Planet

- FleetLine: *Id*, Quantity, FleetId, ShipTypeId
    on FleetId ref Fleet
    on ShipTypeId ref ShipType

- ShipTypes: *Id*, Name, Armour, AttackPoints, Speed, Capacity, ConstructTime

- Travels: *Id*, OriginPlanetId, DestinationPlanetId, StartDate, EndDate, Type
    on OriginPlanetId ref Planet
    on DestinationPlanetId ref Planet

- Planets: *Id*, Name, Position, SolarSystem, MetalMineLvl, MetalCapacity, CristalMineLvl, CristalCapacity, DeuteriumMineLvl, DeuteriumCapacity, UserId
    on UserId ref Users

- Defences: *Id*, Quantity, DefencesTypeId, PlanetId
    on DefencesTypeuId ref DefencesType
    on PlanetId ref Planet

- DefencesType: *Id*, Name, AttackPoints, Armour, ConstructTime
