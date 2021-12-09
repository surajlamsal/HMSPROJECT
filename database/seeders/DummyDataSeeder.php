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
                        "floorname" => "First Floor",
                        "floornumber" => "100",
                        "floordescription" => "About First Floor",
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
                        "floorname" => "Secound Floor",
                        "floornumber" => "200",
                        "floordescription" => "About Secound Floor",
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
                        "floorname" => "Third Floor",
                        "floornumber" => "300",
                        "floordescription" => "About Third Floor",
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
                        "floorname" => "Fourth Floor",
                        "floornumber" => "400",
                        "floordescription" => "About Fourth Floor",
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
                        "amenitiesname" => "Parking",
                        "amenitiesdescription" => "Parking",
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
                        "amenitiesname" => "High Speed Wireless Internet",
                        "amenitiesdescription" => "High Speed Wireless Internet",
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
                        "amenitiesname" => "Television ",
                        "amenitiesdescription" => "Television",
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
                        "amenitiesname" => "Mini Fridge",
                        "amenitiesdescription" => "Mini Fridge",
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
                        "amenitiesname" => "Mini Bar",
                        "amenitiesdescription" => "Mini Bar",
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
                        "amenitiesname" => "Wardrobe",
                        "amenitiesdescription" => "Wardrobe",
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
                        "guestname" => "Suraj Lamsal",
                        "address" => "Gaindakot-01",
                        "email" => "suraj@gmail.com",
                        "phone" => "9807552601",
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
                        "guestname" => "sakshyam pokhrel",
                        "address" => "Tandi-02",
                        "email" => "sakshyam@gmail.com",
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
                        "guestname" => "Bikash Kandel",
                        "address" => "Gaurijung-01",
                        "email" => "Bikash@gmail.com",
                        "phone" => "9845632123",
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
                    [
                        "id" => "4",
                        "guestname" => "Nischal Khatiwada",
                        "address" => "Hongkong-01",
                        "email" => "Nischal@gmail.com",
                        "phone" => "9845632685",
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
                    [
                        "id" => "5",
                        "guestname" => "Bipana Sapkota",
                        "address" => "Amarapuri-01",
                        "email" => "Bipana@gmail.com",
                        "phone" => "9845632395",
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
                    [
                        "id" => "6",
                        "guestname" => "Suraj Kandel",
                        "address" => "Gaindakot-02",
                        "email" => "Surajkandel@gmail.com",
                        "phone" => "9825632395",
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
                        "roomtypename" => "Single",
                        "description" => "A room assigned to one person. May have one or more beds",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "1",
                        "higheroccupancy" => "1",
                        "extrabed" => "No",
                        "baseprice" => "2000",
                        "additionalprice" => "0",
                        "extrabedprice" => "0",
                        "amenities_id" => '["1","2","3","4","5","6"]',
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
                        "roomtypename" => "Double",
                        "description" => "A room assigned to two people. May have one or more beds",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "2",
                        "higheroccupancy" => "3",
                        "extrabed" => "Yes",
                        "baseprice" => "4000",
                        "additionalprice" => "0",
                        "extrabedprice" => "1000",
                        "amenities_id" => '["1","2","3","4","5","6"]',
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
                        "roomtypename" => "Triple",
                        "description" => "A room assigned to three people. May have two or more beds",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "2",
                        "higheroccupancy" => "3",
                        "extrabed" => "Yes",
                        "baseprice" => "4500",
                        "additionalprice" => "0",
                        "extrabedprice" => "1000",
                        "amenities_id" =>'["1","2","3","4","5","6"]' ,
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
                        "roomtypename" => "King",
                        "description" => "A room with a king-sized bed. May be occupied by one or more people",
                        "occupancy" => "Adult",
                        "roomtypeimage" => null,
                        "baseoccupancy" => "4",
                        "higheroccupancy" => "5",
                        "extrabed" => "Yes",
                        "baseprice" => "6500",
                        "additionalprice" => "1000",
                        "extrabedprice" => "0",
                        "amenities_id" => '["1","2","3","4","5","6"]',
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
                        "roomno" => "101",
                        "floor_id" => "1",
                        "roomdescription" => "101",
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
                        "roomno" => "102",
                        "floor_id" => "1",
                        "roomdescription" => "102",
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
                        "roomno" => "103",
                        "floor_id" => "1",
                        "roomdescription" => "103",
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
                        "roomno" => "201",
                        "floor_id" => "2",
                        "roomdescription" => "201",
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
                        "roomno" => "202",
                        "floor_id" => "2",
                        "roomdescription" => "202",
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
                        "id" => "6",
                        "roomno" => "301",
                        "floor_id" => "3",
                        "roomdescription" => "301",
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
                        "id" => "7",
                        "roomno" => "302",
                        "floor_id" => "3",
                        "roomdescription" => "302",
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
                ];
            $chunks = array_chunk($dataRoom, 5);
            Room::truncate();
            foreach ($chunks as $chunk) {
                Room::insert($chunk);
            }


        }
    }
