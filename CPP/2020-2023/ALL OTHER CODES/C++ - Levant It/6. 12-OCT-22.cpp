/// Template , STL(standard template library), function, pointer
/// practice on template, Queue , practice
/// link of STL -> https://www.hackerearth.com/practice/notes/standard-template-library/#:~:text=Its%20time%20complexity%20is%20O(logN)%20where%20N%20is%20the,of%20elements%20in%20the%20set.
#include <bits/stdc++.h>
using namespace std;

#define STOP getchar();
#define F first

template <typename T> 
T myMax(T x, T y)
{
    return x+y;
}
  
void temp()
{
     // int n = 1,m = 10;

    // int ans = (n >= m ? n : m);
    // cout << ans << endl;
    // if(n >= m) cout << n << endl;
    // else cout << m << endl;

    cout << myMax<int>(3, 7) << endl; // Call myMax for int
    cout << myMax<double>(3.5, 2.5)
         << endl; // call myMax for double
    cout << (int)myMax<char>('g', 'e')
         << endl; // call myMax for char
}

vector<int> f(int start, int end)
{
    vector<int> store;
    for(start; start <= end; start++)
    {
        store.push_back(start);
    }
    return store;
}

int SUM(int x, int y)
{
    return x+y;
}

int main()
{


    stack<int> stk;
    stk.push(1);
    stk.push(2);
    stk.push(3);
    stk.push(100);

    // cout << stk.top() << endl;
    // cout << "shamim" << endl;

    while(stk.empty() == false) //stk.size() > 0 
    {
        cout << stk.top() << endl;
        stk.pop();
    }

    STOP
    STOP

    auto range = f(50,65);
    for(auto x : range) cout << x << " ";
    cout << endl;
    int mainSum = SUM(5,4);
    cout << mainSum << endl;

    vector<pair<string,int> > vectorOfPairs(3);

    for(int i = 0; i < 3; i++) 
    {
        string str;
        int x;
        cin >> vectorOfPairs[i].first >> vectorOfPairs[i].second;
        // vectorOfPairs[i].first = str;
        // vectorOfPairs[i].second = x;
        // vectorOfPairs.push_back({str,x});
    }

    for(pair<string,int> pr : vectorOfPairs) 
    {
        cout << pr.first << " " << pr.second << endl;
    }

    pair<int,char> pr;
    pr.first = 1;
    pr.second = 'c';

    pair<string,int> info ("my name",12);

    pair<string,int> info2(info);
    pair<string,int> info3;
    info3 = make_pair("name",1);

    cout << info2.F << " " << info2.second << endl;

    // return 0;

    vector<int> myVec(3);
    myVec.push_back(1);
    myVec.push_back(2);
    myVec.push_back(3);
    myVec.push_back(3);

    for(auto x : myVec) cout << x << " ";


    int x = 10;
    
    vector<int> v{1,2,3,4}; // 4
    vector<int> normal; // 0
    cout << normal.size() << endl;
    normal.resize(10);
    v.resize(100);
    cout << v.size() << endl;


    vector<int> sizeDefined(10); // 10
    vector<int> init(6,5); // 10

    for(auto x : init) cout << x << " ";  ///ranged based loop
    cout << endl;

    for(int i = 0; i < v.size(); i++) cout << v[i] << " ";
    cout << endl;

    /// iterator is one kind of special pointer
    vector<int>::iterator it;
    for(it = v.begin(); it != v.end(); it++) cout << *it << " ";
    cout << endl;

  
    
}