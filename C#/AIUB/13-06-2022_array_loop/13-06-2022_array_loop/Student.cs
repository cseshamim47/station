using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _13_06_2022_array_loop { 

    struct s
    {
        int x;   
    }

    internal class Student
    {
        private byte id = 10;

        public byte Id // visibility - type - pascal case NC - cant use () { property }
        {
            get { return this.id; } // accessor
            set { this.id = value; } // accessor
        }
        
        public void Print()
        {
            Console.WriteLine("ID : {0}", this.Id);
        }

    }
}
