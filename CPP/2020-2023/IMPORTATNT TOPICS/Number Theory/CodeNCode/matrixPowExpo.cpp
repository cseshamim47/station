#include <bits/stdc++.h>
using namespace std;
#define int long long
#define mod = 1000000007

const int N = 1e3;
vector<vector<int>> ans(N,vector<int>(N,0));

void mul(vector<vector<int>> &a, vector<vector<int>> &b)
{
    vector<vector<int>> ret(a.size(),vector<int>(a.size(),0));

    for(int i = 0; i < b.size(); i++)
    {
        for(int j = 0; j < b.size(); j++)
        {
            for(int k = 0; k < b.size(); k++)
            {
                ret[i][j] = (ret[i][j]+(a[i][k]*b[k][j]))%mod;
            }
        }
    }

    for(int i = 0; i < b.size(); i++)
    {
        for(int j = 0; j < b.size(); j++)
        {

            a[i][j] = (ret[i][j]+mod)%mod;
        }
    }
}

void matrixPower(vector<vector<int>> &a,int p)
{
    int n = a.size();
    // identity matrix
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            if(i == j)
            {
                ans[i][j] = 1;
            }else ans[i][j] = 0;
        }
    }

    // ret = ret * base

    // for(int i = 0; i < p; i++)
    // {
    //     mul(ans,a);
    // }

    while(p)
    {
        if(p%2 == 0)
        {
            mul(a,a);
            p /= 2;
        }else 
        {
            mul(ans,a);
            p--;
        }
    }

}


int32_t main()
{
    int n,p;
    cin >> n >> p;

    vector<vector<int>> arr(n,vector<int>(n)); 

    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            cin >> arr[i][j];
        }
    }

    matrixPower(arr,p);

    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            cout << ans[i][j] << " ";
        }
        cout << endl;
    }




}