#include <bits/stdc++.h>
using namespace std;


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
                ret[i][j] += (id[i][k]*tm[k][j]);
            }
        }
    }

    for(int i = 0; i < 2; i++)
    {
        for(int j = 0; j < 2; j++)
        {
            id[i][j] = ret[i][j];
            // cout << id[i][j] << " ";
        }
        // cout << endl;
    }
}

// f(n) = f(n-1)+f(n-2)
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
    int ans = (1*id[0][0])+(1*id[1][0]);
    return ans;
}


int main()
{
    int n;
    cin >> n;

    cout << f(n) << endl;    
}