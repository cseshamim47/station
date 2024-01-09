#include <bits/stdc++.h>
using namespace std;

const int n = 4;
int arr[] = {2,3,6,7}; // single element can be taken many time
vector<int> v;

void f(int idx,int target) // TC = O(k * 2^t) --> t = maxelement/minelement
{
    
    if(n == idx) 
    {
        if(target == 0)
        {
            for(auto x : v) cout << x << " ";
            cout << endl;
        }
        return;
    }
    
    if(target-arr[idx] >= 0)
    {
        v.push_back(arr[idx]);
        f(idx,target-arr[idx]);
        v.pop_back();
    }

    f(idx+1,target);
}

int main()
{
    int target = 7;
    f(0,target);
    
}