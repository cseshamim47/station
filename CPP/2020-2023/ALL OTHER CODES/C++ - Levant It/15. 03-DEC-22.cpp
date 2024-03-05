#include <bits/stdc++.h>
using namespace std;
// Tasks : https://www.codesdope.com/practice/cpp-classes-and-objects/

class Parent{
    public:
    Parent(){}
    void printName(string name)
    {
        cout << "This is " << name << endl;
    }
};

class Child : public Parent{
    public:
    Child(){}
};


bool palindrome(const string &str,int L, int R)
{
    bool isPalindrome = true;
    if(L >= R) return true; 
    if(str[L] != str[R]) return false;
    return isPalindrome &= palindrome(str,L+1,R-1);
    // return 
}

int maxElement(const vector<int> &v, int idx)
{
    int mx = INT_MIN;
    if(idx == -1) return INT_MIN;
    return mx = max({mx,v[idx],maxElement(v,idx-1)});
}


int  fact(int n)
{
    if(n == 1) return 1;
    else return n*fact(n-1);
}


int main()
{
    // Parent parent;
    // parent.printName();

    Child child;
    child.printName("child");


    string str = "abcxa";
    cout << palindrome(str,0,str.size()-1) << endl;
    vector<int> v;
    v = {1,200,1900,12,9};
    cout << maxElement(v,v.size()-1) << endl;
    int arr[5] = {1,2,3,4,5};
    cout << fact(5) << endl;

    for(int i = 0; i < 5; i++) cout << *(arr+i) << " ";
    cout << endl;

    char ch[2][2] = {{'a','b'},
                     {'c','d'}};
    for(int i = 0; i < 2; i++)
    {
        for(int j = 0; j < 2; j++)
        {
            cout << ch[i][j];
        }
        cout << endl;
    }

    int *darr = new int[3];
    darr[0] = 1;
    darr[1] = 2;
    darr[2] = 3;
    for(int i = 0; i < 3; i++) cout << darr[i] << " ";
    cout << endl;
    delete[] darr;
    darr = new int[5];
    darr[0] = 1;
    darr[1] = 2;
    darr[2] = 3;

    for(int i = 0; i < 3; i++) cout << darr[i] << " ";

}