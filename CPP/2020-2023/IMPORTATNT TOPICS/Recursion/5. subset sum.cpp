#include <bits/stdc++.h>
using namespace std;

int arr[] = {2,4,3};
vector<int> ans;
void f(int idx, int sum) // TC : O(2^n + 2^n * log 2^n) // SC : O(2^n)
{
    if(idx == 3)
    {
        ans.push_back(sum);
        return;
    }
    f(idx+1,sum);
    f(idx+1,sum+arr[idx]);
}

int main()
{
    f(0,0);    
    sort(ans.begin(),ans.end());
    for(auto x : ans) cout << x << " ";
}