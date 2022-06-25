using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _13_06_2022_array_loop
{
    enum Days : byte/// : byte (this part can be removed. default is intiger)
    {
        Sat, // automatically initialized as 0
        Sun, // 1
        Mon, // 2
        Tue = 50, // can be declared here as well
        Wed // intialized as 51 because of previous one
    }


    internal class test
    {
        public int a = 10;
        public const int b =  100;
        public readonly int c; // not mandaroty to assign value
        
        public test()
        {
            //c = 123123; // can be assigned in constructor multiple times
        }

        public test(int x)
        {
            //c = x;
        }
        
        
        public void M1()
        {
            //c = 123123; // 
        }


    }
}
