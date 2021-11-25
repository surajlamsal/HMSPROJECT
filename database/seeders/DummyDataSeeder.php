<?php

    namespace Database\Seeders;

    use App\Models\Amenities;
    use App\Models\Floor;
    use App\Models\Guest;
    use App\Models\Room;
    use App\Models\Roomtype;
    use Illuminate\Database\Seeder;

    class DummyDataSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */

        public function run ()
        {
            $dataFloor =
                [
                    [
                        "id" => "1",
                        "floorname" => "Test Floor Name",
                        "floornumber" => "Test Floor Name",
                        "floordescription" => "Test Floor Name",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "2",
                        "floorname" => "Test Floor Name2",
                        "floornumber" => "Test Floor Name2",
                        "floordescription" => "Test Floor Name2",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "3",
                        "floorname" => "Test Floor Name3",
                        "floornumber" => "Test Floor Name3",
                        "floordescription" => "Test Floor Name3",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "4",
                        "floorname" => "Test Floor Name24",
                        "floornumber" => "Test Floor Name24",
                        "floordescription" => "Test Floor Name24",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "5",
                        "floorname" => "Test Floor Name5",
                        "floornumber" => "Test Floor Name5",
                        "floordescription" => "Test Floor Name5",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "6",
                        "floorname" => "Test Floor Name26",
                        "floornumber" => "Test Floor Name26",
                        "floordescription" => "Test Floor Name26",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                ];
            $chunks = array_chunk($dataFloor, 5);
            Floor::truncate();
            foreach ($chunks as $chunk) {
                Floor::insert($chunk);
            }
            $dataAmenities =
                [
                    [
                        "id" => "1",
                        "amenitiesname" => "Test Amenities Name",
                        "amenitiesdescription" => "Test Amenities Name",
                        "amenitiesicon" => null,
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "2",
                        "amenitiesname" => "Test Amenities Name2",
                        "amenitiesdescription" => "Test Amenities Name2",
                        "amenitiesicon" => null,
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "3",
                        "amenitiesname" => "Test Amenities Name3",
                        "amenitiesdescription" => "Test Amenities Name3",
                        "amenitiesicon" => null,
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "4",
                        "amenitiesname" => "Test Amenities Name24",
                        "amenitiesdescription" => "Test Amenities Name24",
                        "amenitiesicon" => null,
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "5",
                        "amenitiesname" => "Test Amenities Name5",
                        "amenitiesdescription" => "Test Amenities Name5",
                        "amenitiesicon" => null,
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "6",
                        "amenitiesname" => "Test Amenities Name26",
                        "amenitiesdescription" => "Test Amenities Name26",
                        "amenitiesicon" => null,
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                ];
            $chunks = array_chunk($dataAmenities, 5);
            Amenities::truncate();
            foreach ($chunks as $chunk) {
                Amenities::insert($chunk);
            }
            $dataGuest =
                [
                    [
                        "id" => "1",
                        "guestname" => "Guest Name 1",
                        "address" => "Guest adress 1 ",
                        "email" => "Guest@guest.com",
                        "phone" => "980975464",
                        "citizenship" => "11111",
                        "roomno" => "1",
                        "checkin" => "3333-11-11",
                        "checkout" => "3333-11-11",
                        "status" => "1",
                        "created_at" => "2021-11-01 07:53:06",
                        "created_by" => "1",
                        "updated_at" => "2021-11-01 07:53:06",
                        "updated_by" => "1",
                        "deleted_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",

                    ],
                    [
                        "id" => "2",
                        "guestname" => "Guest Name 2",
                        "address" => "Guest adress 2 ",
                        "email" => "Guest1@guest.com",
                        "phone" => "9809754624",
                        "citizenship" => "11112",
                        "roomno" => "2",
                        "checkin" => "3333-11-11",
                        "checkout" => "3333-11-11",
                        "status" => "1",
                        "created_at" => "2021-11-01 07:53:06",
                        "created_by" => "1",
                        "updated_at" => "2021-11-01 07:53:06",
                        "updated_by" => "1",
                        "deleted_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",

                    ],
                    [
                        "id" => "3",
                        "guestname" => "Guest Name 3",
                        "address" => "Guest adress 3 ",
                        "email" => "Guest3@guest.com",
                        "phone" => "9809754642",
                        "citizenship" => "11111",
                        "roomno" => "3",
                        "checkin" => "3333-11-11",
                        "checkout" => "3333-11-11",
                        "status" => "1",
                        "created_at" => "2021-11-01 07:53:06",
                        "created_by" => "1",
                        "updated_at" => "2021-11-01 07:53:06",
                        "updated_by" => "1",
                        "deleted_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",

                    ],

                ];
            $chunks = array_chunk($dataGuest, 5);
            Guest::truncate();
            foreach ($chunks as $chunk) {
                Guest::insert($chunk);
            }
            $dataRoomType =
                [
                    [
                        "id" => "1",
                        "roomtypename" => "Room Type Name1",
                        "description" => "Room Type Description1",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "Base Occupancy1",
                        "higheroccupancy" => "Higher Occupancy1",
                        "extrabed" => "Yes",
                        "baseprice" => "0",
                        "additionalprice" => "0",
                        "extrabedprice" => "0",
                        "amenities_id" => '["1","2"]',
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "2",
                        "roomtypename" => "Room Type Name12",
                        "description" => "Room Type Description12",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "Base Occupancy12",
                        "higheroccupancy" => "Higher Occupancy12",
                        "extrabed" => "Yes",
                        "baseprice" => "0",
                        "additionalprice" => "0",
                        "extrabedprice" => "0",
                        "amenities_id" => '["1","2"]',
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "3",
                        "roomtypename" => "Room Type Name123",
                        "description" => "Room Type Description123",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "Base Occupancy123",
                        "higheroccupancy" => "Higher Occupancy123",
                        "extrabed" => "Yes",
                        "baseprice" => "0",
                        "additionalprice" => "0",
                        "extrabedprice" => "0",
                        "amenities_id" => '["1","2"]',
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "4",
                        "roomtypename" => "Room Type Name1234",
                        "description" => "Room Type Description1234",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "Base Occupancy1234",
                        "higheroccupancy" => "Higher Occupancy1234",
                        "extrabed" => "Yes",
                        "baseprice" => "0",
                        "additionalprice" => "0",
                        "extrabedprice" => "0",
                        "amenities_id" => '["1","2"]',
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "5",
                        "roomtypename" => "Room Type Name12345",
                        "description" => "Room Type Description12345",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "Base Occupancy12345",
                        "higheroccupancy" => "Higher Occupancy12345",
                        "extrabed" => "Yes",
                        "baseprice" => "0",
                        "additionalprice" => "0",
                        "extrabedprice" => "0",
                        "amenities_id" => '["1","2"]',
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "6",
                        "roomtypename" => "Room Type Name12346",
                        "description" => "Room Type Description12346",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "Base Occupancy12346",
                        "higheroccupancy" => "Higher Occupancy12346",
                        "extrabed" => "Yes",
                        "baseprice" => "0",
                        "additionalprice" => "0",
                        "extrabedprice" => "0",
                        "amenities_id" => '["1","2"]',
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                ];
            $chunks = array_chunk($dataRoomType, 5);
            Roomtype::truncate();
            foreach ($chunks as $chunk) {
                Roomtype::insert($chunk);
            }
            $dataRoom =
                [
                    [
                        "id" => "1",
                        "roomno" => "Room number 1",
                        "floor_id" => "4",
                        "roomdescription" => "Adult43",
                        "roomtype_id" => "1",
                        "availability" => "Yes",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "2",
                        "roomno" => "Room number 11",
                        "floor_id" => "1",
                        "roomdescription" => "Adult23",
                        "roomtype_id" => "2",
                        "availability" => "Yes",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "3",
                        "roomno" => "Room number 12",
                        "floor_id" => "4",
                        "roomdescription" => "Adult2",
                        "roomtype_id" => "3",
                        "availability" => "Yes",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "4",
                        "roomno" => "Room number 121",
                        "floor_id" => "3",
                        "roomdescription" => "Adult21",
                        "roomtype_id" => "4",
                        "availability" => "Yes",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "5",
                        "roomno" => "Room number 133",
                        "floor_id" => "2",
                        "roomdescription" => "Adult55",
                        "roomtype_id" => "5",
                        "availability" => "Yes",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "6",
                        "roomno" => "Room number 166",
                        "floor_id" => "1",
                        "roomdescription" => "Adult66",
                        "roomtype_id" => "5",
                        "availability" => "Yes",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                ];
            $chunks = array_chunk($dataRoom, 5);
            Room::truncate();
            foreach ($chunks as $chunk) {
                Room::insert($chunk);
            }


        }
    }
