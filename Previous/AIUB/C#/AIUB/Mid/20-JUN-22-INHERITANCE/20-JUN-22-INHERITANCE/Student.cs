using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _20_JUN_22_INHERITANCE
{
    // https://notepad.pw/arijitsarker
    internal class Student : Person
    {
        private double cgpa;

        internal double Cgpa
        {
            get { return cgpa; }
            set 
            { 
                if(value < 0 || value > 4)
                {
                    cgpa = -1;
                }else cgpa = value;
            }
        }
        internal Student(byte id, string name, DateFormat dateOfBirth,double cgpa) : base(id,name,dateOfBirth)
        {
            this.Cgpa = cgpa;
        }

    }
}
