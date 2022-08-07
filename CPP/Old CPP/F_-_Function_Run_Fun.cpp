#include <iostream>
#include <stdio.h>
using namespace std;

int dp[60][60][60];
int f(int a, int b, int c)
{
    if(a <= 0 or b <= 0 or c <= 0) return 1;
    if(dp[a][b][c]) return dp[a][b][c];
    else if(a < c && b < c) return dp[a][b][c] = f(a,b,c-1) + f(a,b-1,c-1) - f(a,b-1,c);
    else return dp[a][b][c] = f(a-1, b, c) + f(a-1, b-1, c) + f(a-1, b, c-1) - f(a-1, b-1, c-1);
}


int Case;
void solve()
{
    
    int a,b,c;
    while(true)
    {
        cin >> a >> b >> c;
        if(a == -1 && b == -1 && c == -1) return;

        printf("w(%d, %d, %d) = ",a,b,c);
        if(a > 20) a = 20;
        if(b > 20) b = 20;
        if(c > 20) c = 20;
        cout <<  f(a,b,c) << endl;

    }
}


int main()
{
    //    Bismillah
    solve();
}