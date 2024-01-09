using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _20_JUN_22_INHERITANCE
{
    internal struct DateFormat
    {
        private byte day, month;
        private ushort year;
        internal DateFormat(byte day, byte month, ushort year)
        {
            this.day = day;
            this.month = month;
            this.year = year;
        }

        internal void PrintDate()
        {
            Console.WriteLine("Date of Birth: {0}.{1}.{2}", this.day, this.month, this.year);
        }
    }
    internal class Person
    {
        private byte id;
        private string name;
        private DateFormat dateOfBirth;

        internal byte Id
        {
            get { return this.id; } 
            set { this.id = value; } 
        }
        
        internal string Name
        {
            get { return this.name; } 
            set { this.name = value; } 
        }
        
        
        internal DateFormat DateOfBirth
        {
            get { return this.dateOfBirth; } 
            set { this.dateOfBirth = value; } 
        }

        internal Person()
        {

        }
        internal Person(byte id, string name, DateFormat dateOfBirth)
        {
            this.Id = id;
            this.Name = name;
            this.DateOfBirth = dateOfBirth;
        }

        internal void ShowPersonInfo()
        {
            Console.WriteLine("Id: {0}", this.Id);
            Console.WriteLine("Name: {0}", this.Name);
            this.dateOfBirth.PrintDate();
        }
    }
}
