#include <bits/stdc++.h>
using namespace std;

int rec(int n,int p,int sum)
{
    int np = pow(n,p);
    if(np < sum)
    {
        return rec(n+1,p,sum) + rec(n+1,p,sum-np);
    }
    else if(np == sum)
    {
        return 1;
    }
    else return 0;
}

int main()
{
    //    Bismillah
    int sum;
    int p;
    cin >> sum >> p;
    int n = 1;
    cout << rec(n,p,sum) << endl;   
}