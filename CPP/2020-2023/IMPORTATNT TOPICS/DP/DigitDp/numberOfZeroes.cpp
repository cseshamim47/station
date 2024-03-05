#include <bits/stdc++.h>
using namespace std;

int dp1[11][2][2];
int dp2[11][2];
int ara[20];

int func2(int pos, int isSmall)
{
    if(pos == 10) return 1;
    if(dp2[pos][isSmall] != -1) return dp2[pos][isSmall];

    int lo = 0, hi = ara[pos], re = 0;
    if(isSmall) hi = 9;

    for(int i = lo; i <= hi; i++)
    {
        re += func2(pos+1,isSmall | (i < hi));
    } 
    return dp2[pos][isSmall] = re;
}

int func(int pos, int isSmall, int hasStarted)
{
    if(pos == 10) return 0;
    if(dp1[pos][isSmall][hasStarted] != -1) return dp1[pos][isSmall][hasStarted];

    int lo = 0, hi = ara[pos], re = 0;
    if(isSmall) hi = 9;
    for(int i = lo; i <= hi; i++)
    {
        int val = func(pos+1, isSmall | (i < hi), hasStarted | (i != 0));

        if(hasStarted && i == 0) val = val + func2(pos+1, isSmall | i < hi);

        re += val; 
    } 
    return dp1[pos][isSmall][hasStarted] = re;
}


int main()
{
    //    Bismillah

    string str;
    cin >> str;
    int k = 10-str.size();
    for(int i = 0;i < str.size();i++) ara[k++] = str[i]-'0';

    memset(dp1,-1,sizeof(dp1));
    memset(dp2,-1,sizeof(dp2));

    cout << func(1,0,0) << endl;
    
}