#include <bits/stdc++.h>
using namespace std;

string str;
string nim;
int f(int pos, bool lastSame)
{
    if(pos == str.size()) 
    {
        cout << nim << endl;
        return 0;
    }

    int limit = 9;
    if(lastSame == true) limit = str[pos]-'0';

    int sum = 0;
    for(int i = 0; i <= limit; i++)
    {
        if(lastSame == false || i < limit)
        {
            nim.push_back(i+48);
            sum += (i) + f(pos+1,false);
            nim.pop_back();
        }else 
        {
            nim.push_back(i+48);
            sum += (i) + f(pos+1,true);
            nim.pop_back();
        }
    }
    return sum;
}

int main()
{
    cin >> str;


    cout << f(0,true) << endl;


}