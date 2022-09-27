using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _13_06_2022_array_loop
{
    internal class Program
    {

        /*
         * rules : 
         * never use get set - use property instead
         * never use i/j in loop
         * get set in property - called accessor
         * {
             * method - member function
             * variable - field, member variable, attribute
             * property
         * }
         *  constant(3 types)  
         *  {
         *      1. 1-INF = Literal Constant // only declared during declarion and read using class name
         *      2. readonly - can be accessed using object and initialized using constructor 
         *      3. set/collection of constant - enum ( enumaration ) - can be used/declared within/without class  //value type
         *                  
         *  }
         *  
         *  value type, null type (can be used only in reference type), reference type, nullable type ( can be used in value type also )
         *  
         *  
         *  struct vs class
         *  {
         *      class - can initialize a value
         *      struct - cannot initialize a value while decalring
         *      
         *  
         *  }
         */

        public static void jagArray()
        {

            //int[] arr = new int[4]; // dynamic declaration
            // int[] arr = new int[] { 0, 1, 0, 2 }; // dynamic declaration
            // int[] arr = new int[] { 0, 1, 0, 2 }; // dynamic declaration

            //for(int q = 0; q < 4; q++)
            //{
            //    arr[q] = q;
            //}

            //for(int q = 0; q < 4; q++) Console.Write("{0} ", arr[q]);


            //string str = Console.ReadLine();
            //int temp = Convert.ToInt32(str);
            //Console.WriteLine("{0}",temp+10);




            // for (int q = 0; q < arr.Length; q++) arr[q] = Convert.ToInt32(Console.ReadLine());
            // for (int q = 0; q < arr.Length; q++) Console.Write("{0}, ",arr[q]);


            //int[][] jaggedArray = new int[5][]; // dynamic multi dymentional array

            //for(int i = 0; i < 5; i++)
            //{
            //    jaggedArray[i] = new int[i + 2]; //
            //}

            //for(int i = 0; i < 5; i++)
            //{
            //    for(int q = 0; q < i+2; q++)
            //    {
            //        jaggedArray[i][q] = q + 1;
            //    }
            //}

            //for (int i = 0; i < 5; i++)
            //{
            //    Console.Write("size : {0} -> ", jaggedArray[i].Length);
            //    for (int q = 0; q < i + 2; q++)
            //    {
            //        Console.Write("{0} ", jaggedArray[i][q]);
            //    }
            //    Console.WriteLine();
            //}

            //int[,] arr = new int[2, 3];

            //int row = 0, col = 0, mm = 1 ;
            //while (row < 2)
            //{
            //    col = 0;
            //    while (col < 3)
            //    {
            //        arr[row,col] = mm++;
            //        col++;
            //    }
            //    row++;
            //}
            //row = 0;
            //col = 0;

            //while (row < 2)
            //{
            //    col = 0;
            //    while (col < 3)
            //    {
            //        Console.Write("{0} ", arr[row, col]);
            //        col++;
            //    }
            //    Console.WriteLine();
            //    row++;
            //}

        }



        static void Main(string[] args)
        {
            //Program.jagArray();
            /////-------------

            /*  
             */
                        Nullable<int> p = null; // initialize is mandatory
                        int? y = null;

                        int r = y ?? 0; // any value can be given..it'll replace null as that value if y is null

                        Console.WriteLine(r);

                        /////-------------


                        //Student[] studentList = new Student[2];

                        //studentList[0] = new Student();

                        //studentList[0].Id = 1;

                        //studentList[0].Print();




            // 25 jun
                        int g = (int)Days.Tue;
                        Console.WriteLine("{0}", g);

                     string str = null;



            //Console.WriteLine("shamim");
            test tt = null;
            //test t = new test(100123);
            //test t1 = new test(123);

            
            //Console.WriteLine(test.b);
            //Console.WriteLine(t1.c);
            //Console.WriteLine("end");
        }
    }
}
