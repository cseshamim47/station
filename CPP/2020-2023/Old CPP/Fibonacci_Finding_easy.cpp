#include <bits/stdc++.h>
using namespace std;

#define int long long
#define mod 1000000007
void mul(int id[][2], int tm[][2])
{
    int ret[2][2];
    memset(ret,0,sizeof ret);
    for(int i = 0; i < 2; i++)
    {
        for(int j = 0; j < 2; j++)
        {
            for(int k = 0; k < 2; k++)
            {
                ret[i][j] = (ret[i][j] + (id[i][k]*tm[k][j]))%mod;
            }
        }
    }

    for(int i = 0; i < 2; i++)
    {
        for(int j = 0; j < 2; j++)
        {
            id[i][j] = (ret[i][j]+mod)%mod;
            // cout << id[i][j] << " ";
        }
        // cout << endl;
    }
}

// F(n) = 2Fn-1 + 3Fn-2   for n > 2
// F(1) = 2, F(2) = 3;
int a,b;
int f(int n)
{
    // transformation matrix
    int tm[2][2];
    tm[0][0] = 0;
    tm[0][1] = 1;
    tm[1][0] = 1;
    tm[1][1] = 1;

    // identity matrix
    // id = id * tm;
    int id[2][2];
    id[0][0] = 1;
    id[1][1] = 1;
    id[0][1] = 0;
    id[1][0] = 0;


    n--;
    while(n)
    {
        if(n%2 == 0)
        {
            mul(tm,tm);
            n /= 2;
        }else 
        {
            mul(id,tm);
            n--;
        }
    }
    
    // [1 1] * id
    int ans = ((a*id[0][0])+(b*id[1][0])+mod)%mod;
    return ans%mod;
}


int32_t main()
{
    int t;
    cin >> t;
    while(t--)
    {
        int n;
        cin >> a >> b;
        cin >> n;

        // Log N time
        if(n == 1)
        {
            cout << b << endl;   
        }
        else 
        cout << f(n+1) << endl;    
    }
}